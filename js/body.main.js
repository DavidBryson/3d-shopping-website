require.config({
    paths: {
        jquery: 'http://code.jquery.com/jquery-2.0.3.min',
        three: 'https://rawgithub.com/mrdoob/three.js/master/build/three'
    },
    shim: {
        three: {
            exports: 'THREE'
        }
    }
});
require(['src/arm', 'src/chest', 'src/rotateScene', 'src/zoom', 'three'], function(arm, chest, rotate, zoom, THREE) {
    var width = window.innerWidth*0.5;
    var height = window.innerHeight * 0.5;

    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera( 75, width / height, 0.1, 1000 );

    var renderer = new THREE.WebGLRenderer();
    renderer.setSize( width, height );
    document.body.appendChild( renderer.domElement );

    var cube = new THREE.Mesh( new THREE.CubeGeometry( 1, 1, 1 ), new THREE.MeshNormalMaterial() );
    scene.add(cube);



    var body = [];

    arm({side: 'right', scene: scene, body: body});

    arm({side: 'left', scene: scene, body: body});

    chest({scene: scene, body: body});


    camera.position.z = 20;

    function render() {
        requestAnimationFrame(render);
        renderer.render(scene, camera);
    }
    render();

    document.getElementById('armInput').onchange = function (data) {
        var rArm = body['rightArm'];
        var lArm = body['leftArm'];
        rArm.scale.y = document.getElementById('armInput').value;
        lArm.scale.y = document.getElementById('armInput').value;
    }

    document.getElementById('rotateLeft').onclick = function (data) {
        rotate({direction: 'left', scene: scene, camera: camera});
    }

    document.getElementById('rotateRight').onclick = function (data) {
        rotate({direction: 'right', scene: scene, camera: camera});
    }

    document.getElementById('zoomIn').onclick = function (data) {
        zoom({action: 'in', scene: scene, camera: camera});
    }

    document.getElementById('zoomOut').onclick = function (data) {
        zoom({action: 'out', scene: scene, camera: camera});
    }
    
})