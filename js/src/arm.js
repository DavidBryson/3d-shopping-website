define([''], function () {
	return function (param) {
		loader = new THREE.JSONLoader();

		var mesh;

		loader.load("body/"+ param.side + "Arm.js", function (geo) {
			mesh = new THREE.Mesh( geo, new THREE.MeshNormalMaterial() );
			//mesh.scale.set(5, 5, 5);
			if(param.side == 'left'){
				mesh.position.x = 10;
			}else{
				mesh.position.x = -10;
			}
			mesh.position.y = 10;
			mesh.id = param.side + "Arm"
			param.body[mesh.id] = mesh;
			//console.log(mesh);
			param.scene.add(mesh);
		})



	}
})