export default {
  template: '\
    <transition-group\
      name="list-results-transition"\
      mode="out-in"\
      :css="false"\
      v-on:leave="leave"\
      v-on:enter="enter"\
      appear\
      tag="div"\
      style=" width: 100%;"\
    >\
      <slot></slot>\
    </transition-group>\
  ',
  methods: {
        enter: function (el, done) {
            TweenMax.staggerFromTo($(el), 1,  { opacity: 0.1, x: '30px' }, { opacity:1, x: '0px'}, 0.03);
            done()
          },
      leave: function (el, done) {
          done()
      },
    }
}
