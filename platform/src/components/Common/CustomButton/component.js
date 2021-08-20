export default {
  name: 'CustomButton',

  props: {
    disabled: {
      type: Boolean,
      default: false,
    },
    isLoading: {
      type: Boolean,
      default: false,
    },
  },

  methods: {
    handleClick() {
      if (!this.disabled) this.$emit('click');
    },
  },
};
