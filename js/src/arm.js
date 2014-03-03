define([''], function () {
	return function (param) {
		loader = new THREE.JSONLoader();

		var mesh;

		loader.load("body/"+ param.side + "Arm.js", function (geo) {
			mesh = new THREE.Mesh( geo, new THREE.MeshNormalMaterial() );
			//mesh.scale.set(1, 1, 1);
			if(param.side == 'left'){
				mesh.position.x = 1.1;
			}else{
				mesh.position.x = -1.1;
			}
			mesh.position.y = -0.3;
			mesh.position.z = 0.2;
			mesh.id = param.side + "Arm"
			param.body[mesh.id] = mesh;
			//console.log(mesh);
			param.scene.add(mesh);
		})



	}
})