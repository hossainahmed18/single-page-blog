<template>
     <span id="singleblog">
           <section id="content">
			        <div class="container">
					        <div class="row">
					                <div class="span8">
							            <article v-if="showSinglePost">
									                <div class="row">
											                <div class="span8">
													                <div class="post-image">
														                    <div class="post-heading">
														                        <h3>
														                          	<a href="#">{{showSinglePost.title}}  {{this.$route.params.postId}}</a>

														                        </h3>
														                    </div>

														                    <img :src="`images/admin/post/${showSinglePost.photo}`" alt="" />
													                </div>

													                <p>
													                    {{showSinglePost.description}}
													                </p>

													                <div class="bottom-article">
														                    <ul class="meta-post">
															                      <li>

															                          <i class="icon-calendar">
															                           </i>
															                          <a href="#"> Mar 23, 2013</a>
															                      </li>

															                      <li v-if="showSinglePost.user">
															                          <i class="icon-user"></i>
															                          <a href="#">{{ showSinglePost.user.name  }} </a>

															                      </li>


															                      <li v-if="showSinglePost.category">
															                          <i class="icon-folder-open"></i>
															                          <a href="#"> {{ showSinglePost.category.cat_name}} </a>

															                      </li>


															                      <li>
															                          <i class="icon-comments"></i>
															                          <a href="#">4 Comments</a>
															                      </li>

														                    </ul>

													                    	<a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>

													                </div>

											                </div>
										            </div>
							            </article>
					            
					            
					           
							            
					                </div>

					                <BlogSidebar/>


					                
					        </div>


			        </div>
			</section>
     </span>
</template>


<script>
      import BlogSidebar from "./BlogSidebar.vue"
      export default {
        name: "SinglePost",

        components:{
            BlogSidebar
        },
        data(){

            return{
                id: "",
            }

        },
        mounted(){

           this.singlepost()

        },
        
        computed:{

            showSinglePost(){
                return this.$store.getters.passSinglePost
            }

        },
        methods:{
             singlepost(){
                 this.$store.dispatch('getSinglePost',this.$route.params.postId);
             }

        },
        watch:{
             $route(to,from){
                  this.singlepost();
             }
        }



       
    }
</script>

<style scoped>
</style>