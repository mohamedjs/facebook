var io = require('socket.io')(8888);
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database:"facebook",
});

io.on('connection', function(socket){
  console.log('connect');
  socket.on('chat message', function(data){
      insert(data);
    console.log(data.send);
    io.sockets.emit('chat message', data);
  });
  socket.on('disconnect',function(socket){
    console.log('leave');
  })
});
function insert(data) {
  if(data.send &&data.recive&&data.msg){
  var sql = 'INSERT INTO chats (send_id,recive_id,message) VALUES ('+data.send+','+data.recive+',"'+data.msg+'")';}
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
  });
}
