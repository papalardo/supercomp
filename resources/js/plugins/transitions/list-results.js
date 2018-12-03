export default {
  template: '\
    <transition-group\
      name="list-results-transition"\
      mode="out-in"\
      :css="false"\
      v-on:leave="leave"\
      v-on:enter="enter"\
      v-on:before-enter="beforeEnter"\
      appear\
    >\
      <slot></slot>\
    </transition-group>\
  ',
  methods: {
        beforeEnter (el) {
          // TweenMax.set($(el), { opacity: 0, y: '30px' });
        },
        enter: function (el, done) {
            TweenMax.staggerFromTo($(el), 1,  { opacity: 0, y: '30px' }, { opacity:1, y: '0px'}, 0.03);
            done()
          },
      leave: function (el, done) {
          done()
      },
    }
}
