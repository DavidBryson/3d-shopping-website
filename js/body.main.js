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
require(['src/arm', 'three'], function(arm, THREE) {
    var width = window.innerWidth*0.75;
    var height = window.innerHeight * 0.75;

    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera( 75, width / height, 0.1, 1000 );

    var renderer = new THREE.WebGLRenderer();
    renderer.setSize( width, height );
    document.body.appendChild( renderer.domElement );

    var body = [];

    arm({length: 30, side: 'left', scene: scene, body: body});

    camera.position.z = 50;

    function render() {
        requestAnimationFrame(render);
        renderer.render(scene, camera);
    }
    render();

    document.getElementById('armInput').onchange = function (data) {
        var rArm = body['rArm'];
        rArm.scale.y = document.getElementById('armInput').value;
    }

    
})