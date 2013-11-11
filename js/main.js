require.config({
    paths: {
        jquery: 'lib/jquery-1.10.2',
        three: 'lib/three'
    },
    shim: {
        three: {
            exports: 'THREE'
        }
    }
});
require(['jquery', 'three'], function(jquery, three) {
	
})