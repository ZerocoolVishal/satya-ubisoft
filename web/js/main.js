
var productRefreshIntervalSec = 30;
var queueCountIntervalSec = 1;

setInterval(function(){
    $.get(baseUrl + '/site/get-queue-count', function(response) {
        if(response.status === 200) {
            let productsInQueue = response.queue;
            $('#queue').html(`Queue [${productsInQueue}]`);
        }
    });
}, (queueCountIntervalSec * 1000));

setInterval(function(){
    $.get(baseUrl + '/site/get-next-product', function(response) {
        if(response.status === 200 && response.isNewProducts) {
            let container = $('#products-container');
            container.html('');
            container.html(response.products);
        }
    });
}, (productRefreshIntervalSec * 1000));