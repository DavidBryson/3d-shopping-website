define([''], function () {
	return function (param) {
		loader = new THREE.JSONLoader();

		var mesh;

		loader.load("body/chest.js", function (geo) {
			mesh = new THREE.Mesh( geo, new THREE.MeshNormalMaterial() );
			//mesh.scale.set(5, 5, 5);
			mesh.position.y = 10;
			mesh.id = "chest"
			param.body[mesh.id] = mesh;
			//console.log(mesh);
			param.scene.add(mesh);
		})



	}
})