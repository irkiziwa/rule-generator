<template>
  <div>
    <p class="font-weight-bold mb-3">Add Revenue Group</p>
    <div class="form-group">
      <label>Revenue Group Title</label>
      <input type="text" placeholder="Fashion - 15%" class="form-control"/>
    </div>
    <div class="form-group row">
      <div class="col-md-12">
        If
        <v-select
          style="display: inline-block; width: 160px"
          :options="[
            {label: 'all'},
            {label: 'atleast one'},
            {label: 'some'}
          ]"
        />
        of the below conditions are met
      </div>
    </div>
    <div class="form-group" style="background: lightgrey">
      <div class="rule-container" style="padding: 10px" v-for="(rule, index) in rules" :key="index">
        Rule {{ index + 1 }} <br>
        <v-select
          style="display: inline-block; width: 20%; background: #fff"
          :options="[
            {label: 'aff_sub'},
            {label: 'another option'},
            {label: 'last option'}
          ]"
        />
        <v-select
          style="display: inline-block; width: 20%; background: #fff"
          :options="[
            {label: 'is'},
            {label: 'is not'},
            {label: 'are'},
            {label: 'are not'},
          ]"
        />
        <div class="input-wrapper" v-bind:style="{'left': param.left, 'display': param.display}" style="display: inline-block; position: relative; width: 50%" v-for="(param, pIndex) in rule.parameters" :key="pIndex">
          <input type="text" placeholder="insert parameter" class="form-control" style="width: 100%" v-model="param.text"/>
          <span v-if="param.isLast" style="cursor: pointer; color: blue; position: absolute; right: 10px; top: 7.5px" @click="addParameter(rule)">add parameter</span>
          <span v-if="param.isLast === false" style="cursor: pointer; color: red; position: absolute; right: 10px; top: 7.5px" @click="removeParameter(rule,pIndex)">remove parameter</span>
        </div>
        <div class="btn" style="position: absolute; right: 10px">
          <button style="border-radius: 30px" @click="deleteRule(index)">-</button>
          <button style="border-radius: 30px" @click="addRule">+</button>
        </div>
      </div>
    </div>
    <div class="form-group">
      <!-- then revenue is <input type="number" placeholder="0" class="form-control" style="display: inline-block; width: 20%"/> -->
      then revenue is <div class="revenue" style="position:relative; display: inline-block; width: 20%">
        <input type="number">
        <span style="position: absolute; top: 5px; right: -30px">%</span>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  created() {
    
  },

  data() {
    return {
      rules: [{parameters: [{text: null, left: false, display: 'inline-block', isLast: true}]}]
    }
  },

  methods: {
    addParameter(target) {
      Vue.set(target.parameters[target.parameters.length - 1], 'isLast', false)
      if (target.parameters.length - 1 !== 0) {
        Vue.set(target.parameters[target.parameters.length - 1], 'display', 'block')
      }
      target.parameters.push({left: '41.25%', display: 'inline-block', isLast: true})
    },
  
    addRule() {
      this.rules.push({parameters: [{text: null, left: false, display: 'inline-block', isLast: true}]})
    },

    deleteRule(target) {
      this.rules.splice(target, 1)
    },

    removeParameter(target, param_index) {
      target.parameters = target.parameters.filter((param,index) => index !== param_index)
      target.parameters.forEach((element, index) => {
        if (index === 0) {
          element.left = false,
          element.display = 'inline-block'
        }
      });
      // if (target.parameters.length === 1) {
      //   Vue.set(target.parameters[target.parameters.length - 1], 'display', 'inline-block')
      //   Vue.set(target.parameters[target.parameters.length - 1], 'left', false)
      // }
    }
  }
}
</script>