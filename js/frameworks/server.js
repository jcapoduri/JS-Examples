var express = require('express');
var app = express();
var data = [];

app.get('/api/todos', function (req, res) {
  res.send(JSON.stringify(data));
});

app.put('/api/todos', function (req, res) {
  res.send('Hello World!');
});

app.post('/api/todos', function (req, res) {
    console.log(req.body);
    var todo = JSON.parse(req.body);
    data.push(todo);
});

app.delete('/api/todos', function (req, res) {

});

var server = app.listen(3000, function () {

  var host = server.address().address
  var port = server.address().port

  console.log('Example app listening at http://%s:%s', host, port)

})