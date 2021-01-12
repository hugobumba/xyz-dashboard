const express = require('express');
const app = express();

app.get("/", function(request, response){
	app.use(express.static('./'));
	response.sendFile(__dirname+'/homepage.html');
});

app.use('/app', express.static('./redirect.html'));

app.get("/project", function(request, response){
	app.use(express.static('./project'));
	response.sendFile(__dirname+'/project/index.html');
});

app.get("/team", function(request, response){
	app.use(express.static('./team'));
	response.sendFile(__dirname+'/team/index.html');
});

const server = app.listen(3000, function(){
	console.log("servidor a funcionar na porta %s", server.address().port);
});