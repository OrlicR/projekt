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
    database: "pzi"
 });
dbConn.connect(); //konekcija na bazu

app.get('/korisnik', function (request, response) { 
    dbConn.query('SELECT * FROM korisnik', function (error, results, fields) { 
        if (error) throw error; 
        return response.send({ error: false, data: results, message: 'READ Svi korisnici.' }); 
    }); 
});

app.get('/korisnik/:id', function (request, response) { 
    let useful_part_id = request.params.id; 
    if (!useful_part_id) {
    return response.status(400).send({ error: true, message: 'Molim vas upišite korisnikov ID' }); 
    }
    dbConn.query('SELECT * FROM useful_part where id=?', useful_part_id, function (error, results, fields){
    if (error) throw error; 
    return response.send({C}); 
    });
});

app.post("/korisnik", function(request, response){
    var ime = request.body.ime;
    var prezime = request.body.prezime;
    var tel = request.body.tel;
    dbConn.query('INSERT INTO korisnik VALUES(NULL,?,?,?)',[ime, prezime, tel], function (error, results, fields) { 
        if (error) throw error; 
        return response.send({error: false, data: results, message: 'INSERT korisnik ime='+ime});
    }); 
})

app.put("/korisnik/:id", function(request, response){
    var id = request.params.id;
    var tel = request.body.tel;
    dbConn.query('UPDATE korisnik SET tel=? WHERE id=?',[tel, id], function (error, results, fields) { 
        if (error) throw error; 
        return response.send({error: false, data: results, message: 'UPDATE korisnik id='+id+ ' tel'+tel});
    }); 
})

app.delete("/korisnik/:id", function(request, response){
    var id = request.params.id;
    dbConn.query('DELETE FROM korisnik WHERE id=?',id, function (error, results, fields) { 
        if (error) throw error; 
        return response.send({error: false, data: results, message: 'DELETE korisnik id='+id}); 
    }); 
})

// set port
app.listen(3000, function () {
    console.log('Node app is running on port 3000');
});