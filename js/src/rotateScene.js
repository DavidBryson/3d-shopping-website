define([''], function () {
	return function (param) {
		var rotSpeed = 0.1;

		var camera = param.camera;
		var scene = param.scene;
    
        var x = camera.position.x,
            y = camera.position.y,
            z = camera.position.z;

        if(param.direction == 'left'){
            camera.position.x = x * Math.cos(rotSpeed) + z * Math.sin(rotSpeed);
            camera.position.z = z * Math.cos(rotSpeed) - x * Math.sin(rotSpeed);
        }else if(param.direction == 'right'){
        	camera.position.x = x * Math.cos(rotSpeed) - z * Math.sin(rotSpeed);
            camera.position.z = z * Math.cos(rotSpeed) + x * Math.sin(rotSpeed);
        }


        camera.lookAt(scene.position);
	}
})