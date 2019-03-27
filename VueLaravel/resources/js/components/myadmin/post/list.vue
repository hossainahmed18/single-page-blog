<template>
    <div>
                

                <section class="content">
                       
				        <div class="row row justify-content-around">
					        <div class="col-12">


					            <div class="card">


							            <div class="card-header">
							                 <h3 class="card-title">Post List</h3>

							                 <div class="card-tools">
							                       
							                             <router-link to="/add-post" class="btn btn-primary">
							                                  Add Post
							                             </router-link> 
							                       

							                 </div>


							            </div>

							            <!-- /.card-header -->


							            <div class="card-body">
									            <table id="example2" class="table table-bordered table-hover">
									                <thead>
										                <tr>
											                  <th>Sl</th>
											                  <th>User</th>
											                  <th>Category</th>
											                  <th>Title</th>
											                  <th>Description</th>
											                  <th>Photo</th>
											                 
											            </tr>
									                </thead>


									                <tbody>
											            <tr v-for="(post,i) in getAllPosts">
											                  <td>{{i+1}}</td>


											                  <td v-if="post.user">{{post.user.name}}</td>
											                  <td v-else>None</td>

											                  <td v-if="post.category">{{post.category.cat_name}}</td>
											                  <td v-else>None</td>



											                  <td>{{post.title}}</td>

											                  <td>
											                      {{post.description|shortlength(30,"...")}}
											                  </td>

											                  	<td>
											                      <img :src="ourImage(post.photo)" width="60" height="50">

											                  </td>

											                  <td>
											                       <router-link :to="`edit-post/${post.id}`">Edit</router-link>
											                  </td>

											                  <td>
											                       <a href="#" @click.prevent="deletePost(post.id)">Delete </a>
											                  </td>
											                  
											            </tr>
											            
									                
									                
									                </tbody>
									              

									            </table>
							            </div>
			                            <!-- /.card-body -->




					            </div>
					            <!-- /.card -->

					        </div>

				          
				        <!-- /.col -->
				        </div>
				      <!-- /.row -->
				</section>



                


    </div>
</template>


<script>
      export default {
        name: "List",
        mounted(){
            this.$store.dispatch("allPost")
        },
        computed:{
            

            getAllPosts(){
                 return this.$store.getters.getPost

            }
        },
        methods:{
             deleteCategory(id){
                 //console.log(id)
                 axios.get('/category/'+id)
                     .then((response)=>{
                         //this.$router.push('/category-list')
                         this.$store.dispatch("allCategory")
                         Swal.fire({
							  type: 'success',
							  title: 'Done',
							  text: 'Category Deleted Successfully!',
							  footer: '<a href>Why do I have this issue?</a>'
							})
                    })
             },
             ourImage(img){
                 return "images/admin/post/"+img;
             },
             deletePost(id){
                  axios.get('/delete-post/'+id)
                     .then((response)=>{
                         this.$store.dispatch("allPost")
                         Swal.fire({
							  type: 'success',
							  title: 'Done',
							  text: 'Post Deleted Successfully!',
							  footer: '<a href>Why do I have this issue?</a>'
						 })

                     })
                 //
             }

        }

     }   
</script>

<style scoped>
</style>