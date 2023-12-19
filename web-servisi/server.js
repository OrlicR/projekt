var express = require('express');
var app = express();
var bodyParser = require('body-parser');
app.use(bodyParser.json());

//const dbConfig = require("./db.config.js");
var mysql = require('mysql');
var dbConn = mysql.createConnection({ 
    host: "localhost", 
    user: "root", 
    password: "", 
    database: "pjesme"
 });
dbConn.connect(); //konekcija na bazu

app.get('/korisnik', function (request, response) { 
    dbConn.query('SELECT * FROM naziv', function (error, results, fields) { 
        if (error) throw error; 
        return response.send({ error: false, data: results, message: 'READ Sve pjesme.' }); 
    }); 
});

app.get('/naziv/:id', function (request, response) { 
    let useful_part_id = request.params.id; 
    if (!useful_part_id) {
    return response.status(400).send({ error: true, message: 'Molim vas upišite ID' }); 
    }
    dbConn.query('SELECT * FROM useful_part where id=?', useful_part_id, function (error, results, fields){
    if (error) throw error; 
    return response.send({C}); 
    });
});

app.post("/naziv", function(request, response){
    var ime = request.body.ime;
    var izvodac = request.body.izvodac;
    var tel = request.body.zanr;
    dbConn.query('INSERT INTO korisnik VALUES(NULL,?,?,?)',[ime, izvodac, zanr], function (error, results, fields) { 
        if (error) throw error; 
        return response.send({error: false, data: results, message: 'INSERT naziv ime='+ime});
    }); 
})

app.put("/naziv/:id", function(request, response){
    var id = request.params.id;
    var ime = request.body.ime;
    dbConn.query('UPDATE korisnik SET tel=? WHERE id=?',[ime, id], function (error, results, fields) { 
        if (error) throw error; 
        return response.send({error: false, data: results, message: 'UPDATE korisnik id='+id+ ' tel'+ime});
    }); 
})

app.delete("/naziv/:id", function(request, response){
    var id = request.params.id;
    dbConn.query('DELETE FROM korisnik WHERE id=?',id, function (error, results, fields) { 
        if (error) throw error; 
        return response.send({error: false, data: results, message: 'DELETE naziv id='+id}); 
    }); 
})

// set port
app.listen(3000, function () {
    console.log('Node app is running on port 3000');
});