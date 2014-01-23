define([''], function () {
	return function (param) {
		var upperArm = lowerArm = param.length / 2;
		if(param.side = 'left'){
			var side = -2;
		}else{
			var side = 2;
		}

		loader = new THREE.JSONLoader();

		var mesh;

		loader.load("itemData/sample.js", function (geo) {
			mesh = new THREE.Mesh( geo, new THREE.MeshNormalMaterial() );
			mesh.scale.set(5, 5, 5);
			mesh.position.y = -10;
			mesh.position.x = 0;
			mesh.id = "rArm"
			param.body["rArm"] = mesh;
			//console.log(mesh);
			param.scene.add(mesh);
		})

		console.log(mesh);



	}
})