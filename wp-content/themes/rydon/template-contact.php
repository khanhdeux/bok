<?php
/*
 * Template name: Contact
 *
 * Author: ABdoWeb
 * Author Profile: http://themeforest.net/user/abdoweb
 * Theme Name: Rydon 2.0
 */
global $rydon_option;
?>

     <div id="main-content">

            <div class="section st-padding-lg left-align">
               <section>
                  <div class="container">
                     <div class="row">
                        <div class="col-md-8">
                           <h4 class="margin-btm-md"><?php esc_html_e( 'Drop us a line', 'rydon' ); ?></h4>
                           <form id="contact-form">
                               <div class="success"><?php esc_html_e( 'Your message was sent!', 'rydon' ); ?></div>
                               <div class="row">
                                   <div class="col-sm-4 form-group">
                                       <label class="name">
                                           <input class="form-control" type="text" placeholder="<?php esc_html_e( 'Name', 'rydon' ); ?>" data-constraints="@Required @JustLetters" />
                                           <span class="empty-message"><?php esc_html_e( '* This field is required', 'rydon' ); ?></span>
                                           <span class="error-message"><?php esc_html_e( '* Invalid name', 'rydon' ); ?></span>
                                       </label>
                                   </div>
                                   <div class="col-sm-4 form-group">
                                       <label class="email">
                                           <input class="form-control" type="text" placeholder="<?php esc_html_e( 'Email', 'rydon' ); ?>" data-constraints="@Required @Email" />
                                           <span class="empty-message"><?php esc_html_e( '* This field is required', 'rydon' ); ?></span>
                                           <span class="error-message"><?php esc_html_e( '* Invalid email address', 'rydon' ); ?></span>
                                       </label>
                                   </div>
                                   <div class="col-sm-4 form-group">
                                       <label class="phone">
                                           <input class="form-control" type="text" placeholder="<?php esc_html_e( 'Phone', 'rydon' ); ?>" data-constraints="@JustNumbers"/>
                                           <span class="empty-message"><?php esc_html_e( '* This field is required', 'rydon' ); ?></span>
                                           <span class="error-message"><?php esc_html_e( '* Invalid phone numbers', 'rydon' ); ?></span>
                                       </label>
                                   </div>
                               </div>
                               <div class="col-textarea form-group">
                                   <label class="message">
                                       <textarea class="form-control" rows="7" placeholder="<?php esc_html_e( 'Message', 'rydon' ); ?>" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                                       <span class="empty-message"><?php esc_html_e( '* This field is required', 'rydon' ); ?></span>
                                       <span class="error-message"><?php esc_html_e( '* The message is too short', 'rydon' ); ?></span>
                                   </label>
                               </div>
                               <div class="form-group">
                                   <button type="submit" class="btn btn-default btn-wide"><?php esc_html_e( 'Send', 'rydon' ); ?></button>
                              </div>
                           </form>
                           <script type="text/javascript">
                                (function($){
                                $.fn.extend({
                                    forms:function(opt){
                                        if(opt===undefined)
                                            opt={}
                                        this.each(function(){
                                            var th=$(this),
                                                data=th.data('forms'),
                                                _={
                                                    errorCl:'error',
                                                    emptyCl:'empty',
                                                    invalidCl:'invalid',
                                                    notRequiredCl:'notRequired',
                                                    successCl:'success',
                                                    successShow:'4000',
                                                    mailHandlerURL:'<?php echo esc_url( get_template_directory_uri() ); ?>/includes/handler.php',
                                                    ownerEmail:'#',
                                                    stripHTML:true,
                                                    smtpMailServer:'localhost',
                                                    targets:'input,textarea',
                                                    controls:'a[data-type=reset],a[data-type=submit]',
                                                    validate:true,
                                                    rx:{
                                                        ".name":{rx:/^[a-zA-Z'][a-zA-Z-' ]+[a-zA-Z']?$/,target:'input'},
                                                        ".state":{rx:/^[a-zA-Z'][a-zA-Z-' ]+[a-zA-Z']?$/,target:'input'},
                                                        ".email":{rx:/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i,target:'input'},
                                                        ".phone":{rx:/^\+?(\d[\d\-\+\(\) ]{5,}\d$)/,target:'input'},
                                                        ".fax":{rx:/^\+?(\d[\d\-\+\(\) ]{5,}\d$)/,target:'input'},
                                                        ".message":{rx:/.{20}/,target:'textarea'}
                                                    },
                                                    preFu:function(){
                                                        _.labels.each(function(){
                                                            var label=$(this),
                                                                inp=$(_.targets,this),
                                                                defVal=inp.val(),
                                                                trueVal=(function(){
                                                                            var tmp=inp.is('input')?(tmp=label.html().match(/value=['"](.+?)['"].+/),!!tmp&&!!tmp[1]&&tmp[1]):inp.html()
                                                                            return defVal==''?defVal:tmp
                                                                        })()
                                                            trueVal!=defVal
                                                                &&inp.val(defVal=trueVal||defVal)
                                                            label.data({defVal:defVal})                             
                                                            inp
                                                                .bind('focus',function(){
                                                                    inp.val()==defVal
                                                                        &&(inp.val(''),_.hideEmptyFu(label),label.removeClass(_.invalidCl))
                                                                })
                                                                .bind('blur',function(){
                                                                    _.validateFu(label)
                                                                    if(_.isEmpty(label))
                                                                        inp.val(defVal)
                                                                        ,_.hideErrorFu(label.removeClass(_.invalidCl))                                          
                                                                })
                                                                .bind('keyup',function(){
                                                                    label.hasClass(_.invalidCl)
                                                                        &&_.validateFu(label)
                                                                })
                                                            label.find('.'+_.errorCl+',.'+_.emptyCl).css({display:'block'}).hide()
                                                        })
                                                        _.success=$('.'+_.successCl,_.form).hide()
                                                    },
                                                    isRequired:function(el){                            
                                                        return !el.hasClass(_.notRequiredCl)
                                                    },
                                                    isValid:function(el){                           
                                                        var ret=true
                                                        $.each(_.rx,function(k,d){
                                                            if(el.is(k))
                                                                ret=d.rx.test(el.find(d.target).val())                                      
                                                        })
                                                        return ret                          
                                                    },
                                                    isEmpty:function(el){
                                                        var tmp
                                                        return (tmp=el.find(_.targets).val())==''||tmp==el.data('defVal')
                                                    },
                                                    validateFu:function(el){                            
                                                        el.each(function(){
                                                            var th=$(this)
                                                                ,req=_.isRequired(th)
                                                                ,empty=_.isEmpty(th)
                                                                ,valid=_.isValid(th)                                

                                                            if(empty&&req)
                                                                _.showEmptyFu(th.addClass(_.invalidCl))
                                                            else
                                                                _.hideEmptyFu(th.removeClass(_.invalidCl))

                                                            if(!empty)
                                                                if(valid)
                                                                    _.hideErrorFu(th.removeClass(_.invalidCl))
                                                                else
                                                                    _.showErrorFu(th.addClass(_.invalidCl))                             
                                                        })
                                                    },
                                                    getValFromLabel:function(label){
                                                        var val=$('input,textarea',label).val()
                                                            ,defVal=label.data('defVal')                                
                                                        return label.length?val==defVal?'nope':val:'nope'
                                                    }
                                                    ,submitFu:function(){
                                                        _.validateFu(_.labels)                          
                                                        if(!_.form.has('.'+_.invalidCl).length)
                                                            $.ajax({
                                                                type: "POST",
                                                                url:_.mailHandlerURL,
                                                                data:{
                                                                    name:_.getValFromLabel($('.name',_.form)),
                                                                    email:_.getValFromLabel($('.email',_.form)),
                                                                    phone:_.getValFromLabel($('.phone',_.form)),
                                                                    fax:_.getValFromLabel($('.fax',_.form)),
                                                                    state:_.getValFromLabel($('.state',_.form)),
                                                                    message:_.getValFromLabel($('.message',_.form)),
                                                                    owner_email:_.ownerEmail,
                                                                    stripHTML:_.stripHTML
                                                                },
                                                                success: function(){
                                                                    _.showFu()
                                                                }
                                                            })          
                                                    },
                                                    showFu:function(){
                                                        _.success.slideDown(function(){
                                                            setTimeout(function(){
                                                                _.success.slideUp()
                                                                _.form.trigger('reset')
                                                            },_.successShow)
                                                        })
                                                    },
                                                    controlsFu:function(){
                                                        $(_.controls,_.form).each(function(){
                                                            var th=$(this)
                                                            th
                                                                .bind('click',function(){
                                                                    _.form.trigger(th.data('type'))
                                                                    return false
                                                                })
                                                        })
                                                    },
                                                    showErrorFu:function(label){
                                                        label.find('.'+_.errorCl).slideDown()
                                                    },
                                                    hideErrorFu:function(label){
                                                        label.find('.'+_.errorCl).slideUp()
                                                    },
                                                    showEmptyFu:function(label){
                                                        label.find('.'+_.emptyCl).slideDown()
                                                        _.hideErrorFu(label)
                                                    },
                                                    hideEmptyFu:function(label){
                                                        label.find('.'+_.emptyCl).slideUp()
                                                    },
                                                    init:function(){
                                                        _.form=this
                                                        _.labels=$('label',_.form)

                                                        _.preFu()

                                                        _.controlsFu()

                                                        _.form
                                                            .bind('submit',function(){
                                                                if(_.validate)
                                                                    _.submitFu()
                                                                else
                                                                    _.form[0].submit()
                                                                return false
                                                            })
                                                            .bind('reset',function(){
                                                                _.labels.removeClass(_.invalidCl)                                   
                                                                _.labels.each(function(){
                                                                    var th=$(this)
                                                                    _.hideErrorFu(th)
                                                                    _.hideEmptyFu(th)
                                                                })
                                                            })
                                                        _.form.trigger('reset')
                                                    }
                                                }
                                            if(!data)
                                                (typeof opt=='object'?$.extend(_,opt):_).init.call(th),
                                                th.data({cScroll:_}),
                                                data=_
                                            else
                                                _=typeof opt=='object'?$.extend(data,opt):data
                                        })
                                        return this
                                    }
                                })
                                })(jQuery)
                                $(function(){
                                    $('#contact-form').forms({ownerEmail:'<?php echo $rydon_option['forms-email-address']; ?>'});
                                })
                           </script>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                           <h4 class="margin-btm-md"><?php esc_html_e( 'Information', 'rydon' ); ?></h4>
                           <p class="address-block">
                              <?php echo $rydon_option['address-locality']; ?>
                           </p>
                           <p class="phone-block">
                              <?php echo $rydon_option['phone-number']; ?>
                           </p>
                           <p class="email-block">
                              <?php echo $rydon_option['email-address']; ?>
                           </p>
                        </div>
                     </div>
                  </div>
               </section>
            </div>

            
            <div class="section no-padding contact-map">
               <section>
                   <div id="map-canvas"></div>
                  
	                   <script type="text/javascript">
                           function initialize_google_map() {
                               var myLatlng = new google.maps.LatLng(<?php echo $rydon_option['map-coordinates']; ?>);
                               var mapOptions = {
                                   zoom: <?php echo $rydon_option['map-zoom-level']; ?>,
                                   center: myLatlng,
                                   scrollwheel: false
                               }
                               var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                               var marker_icon = {
                                   url: '<?php echo $rydon_option['map-marker']['url']; ?>',
                                   size: new google.maps.Size(44, 49),
                                   origin: new google.maps.Point(0, 0),
                                   anchor: new google.maps.Point(22, 49)
                               };

                               var marker = new google.maps.Marker({
                                   position: myLatlng,
                                   map: map,
                                   title: '<?php bloginfo( $show ); ?>',
                                   icon: marker_icon
                               });
                           }
                           google.maps.event.addDomListener(window, 'load', initialize_google_map);
                   </script>
                   
               </section>
            </div>
         
         
     </div>