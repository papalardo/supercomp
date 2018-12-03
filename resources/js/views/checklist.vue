<template>
    <div class="container" style="height: 100vh;"> 
         <div class="col-md-12">
            <h4>Checklist</h4>
        </div>
        <div class="col-md-12">
            <div class="checklist mb-2">
                <ul class="checklist__list">
                <li class="checklist__list-item" property="checklistItem" mv-multiple v-for="(item, key) in user.checklist" :key="key">
                    <input class="checklist__list-item-control" type="checkbox" property="complete"/>
                    <span class="checklist__list-item-title" property="title"> {{ item.name }} </span>
                </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary" @click.prevent="$router.push({ path: '/products' })"> Voltar </button>
        </div>
    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    computed: {
        ...mapGetters({
            'user': 'user/single',
        })
    }
}
</script>

<style scoped>


ul { 
    padding: 0;
}
li {
    list-style: none;
}
[mv-app] .mv-ui.mv-bar {
  display: none;
}
[mv-app] .mv-ui.mv-item-bar {
  top: 0;
  right: 0;
  height: 100%;
  border: none;
  filter: none;
}
[mv-app] .mv-ui.mv-item-bar button {
  width: 2em;
  height: 100%;
  box-sizing: border-box;
  border-top: none;
  border-bottom: none;
}
[mv-app] .mv-ui.mv-item-bar button:first-child {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
[mv-app] .mv-ui.mv-item-bar button:last-child {
  border-right: none;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
[mv-app] .mv-ui.mv-item-bar button.mv-add {
  display: none;
}
[mv-app] button.mv-add-checklistItem {
  display: block;
  width: calc(100% - 2em);
  height: 2.5em;
  margin: 1em 1em 0;
  color: #fff;
  background-color: #4285f4;
  border: 1px solid #3262ba;
  border-radius: 2px;
  font-size: 0.8em;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.1s ease;
}
[mv-app] button.mv-add-checklistItem:hover {
  background-color: #3262ba;
}

.app-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.checklist {
  padding: 1em;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 2px;
  box-shadow: 0 10px 50px -20px rgba(0, 0, 0, 0.5);
}

.checklist__progress-bar {
  width: 100%;
  height: 1.5em;
}

.checklist__list {
  padding-top: 1em;
}

.checklist__list-item {
  padding: 0.5em 0.25em;
  border: 1px solid #ddd;
  border-radius: 2px;
  margin-bottom: 0.5em;
}

.checklist__list-item-control {
  float: left;
}

.checklist__list-item-title {
  margin-left: 0.25em;
  transition: color 0.15s ease;
}
.checklist__list-item-control:checked + .checklist__list-item-title {
  text-decoration: line-through;
  color: #ccc;
}

</style>
