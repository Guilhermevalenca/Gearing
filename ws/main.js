const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server,{
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

io.on('connection', (socket) => {
    console.log('connected:',socket.id);
    socket.on('new-topic', () => {
        io.emit('update-topics',() => {
            console.log("topicos atualizados")
        })
    });
    socket.on('view-comment', (id) => {
        io.emit('update-comment',id)
    });
    socket.on('edit-topic', (id) => {
        io.emit('update-topic',id)
    });
    socket.on('connected',() => {
        console.log('connected')
    })
    socket.on('disconnect', () => {
        console.log('user disconnected');
    });
});

server.listen(3000, () => {
  console.log('listening on *:3000');
});
