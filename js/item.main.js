require.config({
    paths: {
        jquery: 'http://code.jquery.com/jquery-2.0.3.min',
        three: 'lib/three'
    },
    shim: {
        three: {
            exports: 'THREE'
        }
    }
});
require(['src/itemHas3D'], function(itemHas3D) {
    var url = window.location.pathname;
    var ID = url.substring(url.lastIndexOf('/')+1, url.lastIndexOf('.'));
    itemHas3D(ID);
})