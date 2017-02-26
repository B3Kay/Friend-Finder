/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * <ul class="list">
 <li class="mdl-list__item mdl-list__item--two-line">
 <span class="mdl-list__item-primary-content">
 <i class="material-icons mdl-list__item-avatar">person</i>
 <span>Bryan Cranston</span>
 <span class="mdl-list__item-sub-title">2h ago</span>
 </span>
 <span class="mdl-list__item-secondary-content">
 <span class="mdl-list__item-secondary-info">Roundel 6</span>
 <a class="mdl-list__item-secondary-action" href="#"><i class="material-icons">star</i></a>
 </span>
 </li>
 */
$(document).ready(function () {
    console.log("document loaded");
    
//Time ago plugin to change timestamp to "time ago"
    jQuery("time.timeago").timeago();

//Click function for the menu buttons on each person list
    $('.profile_button').click(function (){
        alert('THIS IS A PROFILE - Quite empty right now.\n\
But in future versions, oh my god! There might say a lot of stuff here!');
    });
    $('.find_button').click(function () {
        //alert('Find');
        console.log("find");
    });
    $('#add-follow-button').click(function(){
        alert('Future implimentations:\n\
                Button for adding new friends to follow!\n\
                Sounds really good right!?');
    });
    
//    $('.modal').modal({
//      dismissible: true, // Modal can be dismissed by clicking outside of the modal
//      opacity: .5, // Opacity of modal background
//      in_duration: 300, // Transition in duration
//      out_duration: 200, // Transition out duration
//      starting_top: '4%', // Starting top style attribute
//      ending_top: '10%', // Ending top style attribute
//      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
//        alert("Ready");
//        console.log(modal, trigger);
//      },
//      complete: function() { alert('Closed'); } // Callback for Modal close
//    }
//  );


});

$(window).on('load', function () {
    console.log("window loaded");

});


function create_li_element(p_id, nickname, time, site) {

    var $text_li = $("<li class=\"mdl-list__item mdl-list__item--two-line\" id=\"" + p_id + "\"></li>");
    var $span_1 = $("<span class=\"mdl-list__item-primary-content\"></span>");
    var $icon = $("<i class=\"material-icons mdl-list__item-avatar\">person</i>");
    var $span_name = $("<span>" + nickname + "</span>");
    var $span_time = $("<span class=\"mdl-list__item-sub-title\">" + time + "</span>");
    var $span_2 = $("<span class=\"mdl-list__item-secondary-content\"></span>");
    var $span_site = $("<span class=\"mdl-list__item-secondary-info\">" + site + "</span>");
    var $span_icon = $("<a class=\"mdl-list__item-secondary-action\" href=\"#\"><i class=\"material-icons\">more_vert</i></a>");
    console.log($icon);
    $span_1.append($icon);
    $span_1.append($span_name);
    $span_1.append($span_time);

    $span_2.append($span_site);
    $span_2.append($span_icon);

    $text_li.append($span_1);
    $text_li.append($span_2);
    console.log($text_li);

    $("#people_list").append($text_li);

}

