



window.fbAsyncInit = function() {
FB.init({
    appId      : '457116829723326',
    cookie     : true,
    xfbml      : true,
    version    : 'v15.0'
});
    
FB.AppEvents.logPageView();   
    
};

(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); http://js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function compartir_producto() {             
  FB.ui({
    method: 'share',
    href: 'https://google.com',
    hashtag: "#MILoMejor"
  }, function(response){});
  }
  


  