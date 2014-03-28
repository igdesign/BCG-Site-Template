function em(px) {
  return (px / 16) + "em";
}

var palm = em(300),
    lap  = em(720),
    desk = em(1024),
    deskSmall = em(1023);



enquire.register("screen and (min-width:"+palm+")", { // <-- the bracket was here
  match : function() {
/*     console.log("Palm sized") */
  },
  unmatch : function() {
/*     console.log("NOT Palm sized") */
  }
}); // Note the closing round bracket here





enquire.register("screen and (min-width:"+lap+") and (max-width: "+deskSmall+")", {
  match : function() {
    var modulesToCFooter = document.getElementsByClassName('js-lap-adopt-to-component-footer');
    var parent = document.getElementsByClassName('l-component-footer js-lap-parent');

    for (var i = 0; i < modulesToCFooter.length; i++) {
      console.log(modulesToCFooter[i]);

      var adopted = document.adoptNode (modulesToCFooter[i]);
      if (adopted) {
          parent[0].appendChild (adopted);
      }
    }
  }
});




enquire.register("screen and (min-width: "+desk+")", {
  match : function() {
    console.log('desk');
    var modulesToSidebar = document.getElementsByClassName('js-desk-adopt-to-sidebar');
    var parent = document.getElementsByClassName('l-sidebar js-desk-parent');

/*     console.log(modulesToSidebar); */
/*     console.log(parent); */

    /* console.log(typeof modulesToSidebar); */


    for (i = 0; i < modulesToSidebar.length; i++) {
      console.log(modulesToSidebar[i]);

      var adopted = document.adoptNode (modulesToSidebar[i]);
      if (adopted) {
          parent[0].appendChild (adopted);
      }
    }
  },
});
