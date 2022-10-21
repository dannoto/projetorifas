<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="<?=base_url() ?>assets/js/jquery.maskMoney.min.js"></script>

<script>
    $(".tickets-quantity").on('click','li',function (){
                    alert($(this).text());
    });


  


    function toggleNav() {
        const nav = document.getElementById("sideNav")
        if (nav.style.width == "0px") {
          nav.style.width = "90%"
          nav.style.display = "block"
        } else {
          nav.style.width = "0px"
          nav.style.display = "none"
        }
    }

</script>


<script>

  // alertify.defaults = {
  //         // dialogs defaults
  //         autoReset:true,
  //         basic:false,
  //         closable:true,
  //         closableByDimmer:true,
  //         invokeOnCloseOff:false,
  //         frameless:false,
  //         defaultFocusOff:false,
  //         maintainFocus:true, // <== global default not per instance, applies to all dialogs
  //         maximizable:true,
  //         modal:true,
  //         movable:true,
  //         moveBounded:false,
  //         overflow:true,
  //         padding: true,
  //         pinnable:true,
  //         pinned:true,
  //         preventBodyShift:false, // <== global default not per instance, applies to all dialogs
  //         resizable:true,
  //         startMaximized:false,
  //         transition:'pulse',
  //         transitionOff:false,
  //         tabbable:'button:not(:disabled):not(.ajs-reset),[href]:not(:disabled):not(.ajs-reset),input:not(:disabled):not(.ajs-reset),select:not(:disabled):not(.ajs-reset),textarea:not(:disabled):not(.ajs-reset),[tabindex]:not([tabindex^="-"]):not(:disabled):not(.ajs-reset)',  // <== global default not per instance, applies to all dialogs

  //         // notifier defaults
  //         notifier:{
  //         // auto-dismiss wait time (in seconds)  
  //             delay:5,
  //         // default position
  //             position:'bottom-right',
  //         // adds a close button to notifier messages
  //             closeButton: false,
  //         // provides the ability to rename notifier classes
  //             classes : {
  //                 base: 'alertify-notifier',
  //                 prefix:'ajs-',
  //                 message: 'ajs-message',
  //                 top: 'ajs-top',
  //                 right: 'ajs-right',
  //                 bottom: 'ajs-bottom',
  //                 left: 'ajs-left',
  //                 center: 'ajs-center',
  //                 visible: 'ajs-visible',
  //                 hidden: 'ajs-hidden',
  //                 close: 'ajs-close'
  //             }
  //         },

  //         // language resources 
  //         glossary:{
  //             // dialogs default title
  //             title:'AlertifyJS',
  //             // ok button text
  //             ok: 'OK',
  //             // cancel button text
  //             cancel: 'Cancel'            
  //         },

  //         // theme settings
  //         theme:{
  //             // class name attached to prompt dialog input textbox.
  //             input:'ajs-input',
  //             // class name attached to ok button
  //             ok:'ajs-ok',
  //             // class name attached to cancel button 
  //             cancel:'ajs-cancel'
  //         },
  //         // global hooks
  //         hooks:{
  //             // invoked before initializing any dialog
  //             preinit:function(instance){},
  //             // invoked after initializing any dialog
  //             postinit:function(instance){},
  //         },
  //     };

</script>