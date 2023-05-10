var tabsApp = (function () {
  // variables & binds here

  var resize = function () {
    //call all resize related functions here
  };

  var init = function () {
    //Call functions to be used in init
  };

  var scroll = function () {
    //Add window scroll related functions here
  };

  /*METHODS
    ##########################################################################################**/

  return { init: init, resize: resize, scroll: scroll };
})();

//BINDS TO INIT, RESIZE ETC
document.addEventListener("DOMContentLoaded", function () {
  var elements = document.getElementsByClassName("block tabs");

    /*
    We want to check every element in DOM so we can setup our classes properly.
    Also there might be multiple of these sections and we want them all to be defined.
    */
    for (var i = 0; i < elements.length; i++) {

      var tabs = elements[i];

      if (tabs) {
        var imagesClass = tabs.getElementsByClassName("images")[0];
        var desktopImages = imagesClass.getElementsByClassName("item-image-container");

        var contentClass = tabs.getElementsByClassName("content")[0];
        var contentBlocks = contentClass.getElementsByClassName(
  "item-content-container"
        );
        var mobileImages = contentClass.getElementsByClassName(
          "item-image-container"
        );

        var allImages = tabs.getElementsByClassName("item-image-container");

        var selected = 0;
        contentBlocks[selected].classList.add("selected");
        contentBlocks[selected].classList.add("desktop-selected");
        desktopImages[selected].classList.add("selected");
        mobileImages[selected].classList.add("selected");

        const hideElements = () => {
          for (var i = 0; i < allImages.length; i++) {
            allImages[i].style.display = "none";
          }
        };
      }
    }

    // Here starts the tab functionality
    document.querySelectorAll('.block.tabs .content .item-content-container').forEach(item => {
      item.addEventListener('click', event => {

        /*
        Mobile version works as accordion so the HTML is structured differently
        */
        var desktopImages = item.parentElement.previousElementSibling;
        var allContent    = item.parentElement.children;
        var allImages     = desktopImages.getElementsByClassName("item-image-container");

        const isMobile = window.matchMedia("only screen and (max-width: 1024px)").matches;

        if (isMobile) {
          var imageMobile = item.querySelectorAll('.item-image-container');
          if (item.classList.contains("selected")) {
            item.classList.remove("selected");
            imageMobile[0].classList.remove("selected");
          } else {
            item.classList.add("selected");
            imageMobile[0].classList.add("selected");
          }
        } else {

					if (item.classList.contains("selected")) {
						item.classList.remove("selected");
						allImages.classList.remove("selected");
					}

          /*
          We have uniqueIDs setup(check block-general-tabs.php) for images
          and content so desktop version knows when to show them when we click the tab
          */
					var selectedId = item.getAttribute('data-id');

          for (var i = 0; i < allContent.length; i++) {
            allContent[i].classList.remove("selected");
            allContent[i].classList.remove("desktop-selected");
          }

          for (var i = 0; i < allImages.length; i++) {
						if (allImages[i].getAttribute('data-id') == selectedId) {
              item.classList.add("selected");
              item.classList.add("desktop-selected");
              allImages[i].classList.add("selected");
							item.parentElement.parentElement.parentElement.scrollIntoView({ block: "start" });
            } else {
              allImages[i].classList.remove("selected");
            }
          }
        }
      })
    })

  tabsApp.init();

});

window.addEventListener("resize", function () {
  tabsApp.resize();
});

window.addEventListener("scroll", function () {
  tabsApp.scroll();
});
