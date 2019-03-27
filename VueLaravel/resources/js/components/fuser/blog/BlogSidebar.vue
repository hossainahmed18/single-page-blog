<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input  placeholder="Type something" @keyup.prevent="RealSearch" type="text" class="input-medium search-query" v-model="keyword">
                  <button type="submit"  class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">

                  <li v-for="category in showUserCategories"><i class="icon-angle-right"></i><router-link :to="`/category/${category.id}`">{{category.cat_name}}</router-link><span> (20)</span></li>

                </ul>
              </div>


              <div class="widget">
	                <h5 class="widgetheading">Latest posts</h5>
	                <ul class="recent">

	                  <li v-for="(post,index) in showLatestPost" v-if="index<5">
	                    
                        <router-link :to="`/singlepost/${post.id}`" > <img :src="`images/admin/post/${post.photo}`" class="pull-left" alt="" width="40" height="40"/> </router-link>

	                    <h6> <router-link :to="`/singlepost/${post.id}`" >{{post.title | shortlength(70,"...")}} </router-link> </h6>
	                    <p>
	                        {{post.description | shortlength(100,"...")}}
	                    </p>
	                  </li>

	                </ul>
              </div>

            </aside>
          </div>
    </span>
</template>


<script>
      import _ from 'lodash'
      export default {
        name: "PostSidebar",
        data(){
            return{
                keyword:""
            }
        },
        mounted(){

           this.$store.dispatch('userGetAllCategories');
           this.$store.dispatch('getLatestPost');

        },
        
        computed:{

            showUserCategories(){
                return this.$store.getters.passUserCategories
            },
            showLatestPost(){
                return this.$store.getters.passLatestPost
            }


        },
        methods:{
           
            RealSearch:_.debounce(function(){
                this.$store.dispatch('getSearchPost',this.keyword)
            },1000)
        }
    }
</script>

<style scoped>
</style>