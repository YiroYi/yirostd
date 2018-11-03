<template>
  <!--main-container-->
  
</template>

<script>

    export default {

        mounted() {

          $(document).ready(function(){

          this.$("#rev_slider_1").show().revolution({
              sliderType: "standard",
              sliderLayout: "fullscreen",
              dottedOverlay: "none",
              delay: 9000000,
              autoPlay: true,
              spinner: "spinner4",
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "on",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                  arrows: {
                      enable: true,
                      style: 'metis',
                      tmp: '',
                      rtl: false,
                      hide_onleave: true,
                      hide_onmobile: true,
                      hide_under: 0,
                      hide_over: 9999,
                      hide_delay: 200,
                      hide_delay_mobile: 1200,
                      left: {
                          container: 'slider',
                          h_align: 'left',
                          v_align: 'center',
                          h_offset: 20,
                          v_offset: 0
                      },
                      right: {
                          container: 'slider',
                          h_align: 'right',
                          v_align: 'center',
                          h_offset: 20,
                          v_offset: 0
                      }
                  },
              },
              responsiveLevels: [1240, 1024, 778, 480],
              gridwidth: [1240, 1024, 778, 480],
              gridheight: [868, 768, 960, 720],
              lazyType: "none",
              shadow: 0,
              shuffle: "off",
              autoHeight: "off",
          });

          });
            console.log('Component mounted.')
        }
    }
</script>
<!--<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>-->
