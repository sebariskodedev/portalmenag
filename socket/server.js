const express = require('express');
const http = require('http');
const { Server } = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = new Server(server);

let onlineUsers = 0;

// Serve a simple HTML client
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});

// Handle WebSocket connections
io.on('connection', (socket) => {
    const clientIp = socket.request.connection.remoteAddress;

    onlineUsers++;
    console.log(`Client IP Address ${clientIp} is connected`);
    io.emit('status', { online: onlineUsers });

    socket.on('disconnect', () => {
        onlineUsers--;
        console.log(`Client IP Address ${clientIp} is disconnected`);
        io.emit('status', { online: onlineUsers });
    });
});

server.listen(3000, () => {
    console.log('Server running at http://localhost:3000');
});
