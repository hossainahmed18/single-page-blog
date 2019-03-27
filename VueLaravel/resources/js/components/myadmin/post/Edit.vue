<template>
      <div>




    

    <!-- Main content -->
    <section class="content">


        <div class="container-fluid">
                <div class="row row justify-content-around">
                    <!-- left column -->
                    <div class="col-md-8">
		                    <!-- general form elements -->


				            <div class="card card-primary">
							            <div class="card-header">
							                <h3 class="card-title">Edit Category</h3>
							            </div>
				            



							            <form role="form" @submit.prevent="updatePost()">
							            
							                <div class="card-body">
							                  


							                   

                                                 <div class="form-group">
                                                    <label for="postId">Update Post</label>

                                                    <input type="text" class="form-control" id="postId" placeholder="Post Title" v-model="form.title" name="title">

                                                   

                                                   
                                                </div>

                                                <div class="form-group">
                                                    <label for="descriptionId">Add New Description</label>

                                                    <textarea v-model="form.description"></textarea>

                                                    
                                                </div>


                                                 <div class="form-group" >
                                                        <label>Select</label>
                                                        <select class="form-control" v-model="form.cat_id">

                                                            <option disabled value="">Select One</option>

                                                            <option :value="category.id" v-for="category in getAllCategory">{{category.cat_name}}

                                                            </option>

                                                        </select>
                                                       
                                                </div>

                                                <div class="form-group">
                                                       <div v-if="picture_old">
                                                            <img :src="ourOldImage(form.photo)" width="60" height="50">
                                                        </div>
                                                        <div v-else-if="!picture_old">
                                                            <img :src="form.photo" width="60" height="50">
                                                        </div>

                                                        <input  @change="changePhoto($event)" name="photo" type="file" optional>
                                                       
                                                        
                                                </div>




							                  
							                </div>
							                <!-- /.card-body -->

							                <div class="card-footer">
							                  <button type="submit" class="btn btn-primary">Submit</button>
							                </div>
							            </form>



				            </div>
				            <!-- /.card -->

            

           
            
             
                    </div>
                    <!--/.col (right) -->


                </div>
                <!-- /.row -->

        </div>
        <!-- /.container-fluid -->



    </section>

   
  
             




             
      </div>
</template>



<script>

export default {
        name: "Edit",
        data(){
            return {
                form: new Form({
                    title:'',
                    description:'',
                    cat_id:'',
                    photo:'',
                })//post hobe ai form ta..jar value ta uporer form hote asbe..by using model
                ,
                picture_old:true,
            }
        },
        mounted(){
            this.$store.dispatch("allCategory")

            axios.get(`/editpost/${this.$route.params.postId}`)
                .then((response)=>{
                     this.form.fill(response.data.posts) //ata diye uporer data form fill kora hocche
                 })
        },
        methods:{
            updatePost(){
                this.form.post(`/update-post/${this.$route.params.postId}`)
                    .then((response)=>{
                         this.$router.push('/post-list')
                         Swal.fire({
							  type: 'success',
							  title: 'Done.',
							  text: 'Post Updated successfully!',
							  footer: '<a href>Why do I have this issue?</a>'
							})
                    })
                
            },
            ourOldImage(img){
                 return "images/admin/post/"+img;
             },

            changePhoto(event){
                let file= event.target.files[0];
                
                if(file.size>1048576){
                     Swal.fire({
                              type: 'error',
                              title: 'opps.',
                              text: 'Post Added successfully!',
                              footer: '<a href>Why do I have this issue?</a>'
                    })

                }
                else{

                    let reader = new FileReader();
                    reader.onload = event => {
                            this.form.photo = event.target.result
                                
                    };
                    reader.readAsDataURL(file);
                    console.log(file);

                    this.picture_old=false

                }
                
                    
             }

             //

        },
        computed:{
            getAllCategory(){
               return this.$store.getters.getCategory
            }
        }
    }
</script>

<style scoped>
</style>