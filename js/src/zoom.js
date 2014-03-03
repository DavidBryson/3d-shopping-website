define([''], function () {
	return function (param) {

		var camera = param.camera;
		var scene = param.scene;
    
        var x = camera.position.x,
            y = camera.position.y,
            z = camera.position.z;

        if(param.action == 'in'){
            if(x > 0){
            	camera.position.x = x - 1;
            }else if(x < 0){
            	camera.position.x = x + 1;
            }
            if(z > 0){
            	camera.position.z = z - 1;
            }else if(z < 0){
            	camera.position.z = z + 1;
            }
        }else if(param.action == 'out'){
        	if(x > 0){
            	camera.position.x = x + 1;
            }else if(x < 0){
            	camera.position.x = x - 1;
            }
            if(z > 0){
            	camera.position.z = z + 1;
            }else if(z < 0){
            	camera.position.z = z - 1;
            }
        }


        camera.lookAt(scene.position);
	}
})