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
							                <h3 class="card-title">Add New Post</h3>
							            </div>
				            



							            <form role="form" @submit.prevent="addnewPost()" enctype="multipart/form-data">
							            
							                <div class="card-body">
							                  

							                    

							                    <div class="form-group">
				                                    <label for="postId">Add New Category</label>

				                                    <input type="text" class="form-control" id="postId" placeholder="Post Title" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">

				                                    <has-error :form="form" field="title"></has-error>

				                                   
				                                </div>

                                                <div class="form-group">
                                                    <label for="descriptionId">Add New Description</label>

                                                    <textarea v-model="form.description"></textarea>

                                                    <has-error :form="form" field="description"></has-error>
                                                </div>


                                                 <div class="form-group" >
                                                        <label>Select</label>
                                                        <select class="form-control" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">

                                                            <option disabled value="">Select One</option>

                                                            <option :value="category.id" v-for="category in getAllCategory">{{category.cat_name}}

                                                            </option>

                                                        </select>
                                                        <has-error :form="form" field="cat_id"></has-error>
                                                </div>

                                                <div class="form-group" :class="{ 'is-invalid': form.errors.has('photo') }">
                                                        <img :src="form.photo" width="80" height="70" >
                                                        <input @change="changePhoto($event)" name="photo" type="file">
                                                       
                                                        <has-error :form="form" field="photo"></has-error>
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
        name: "New",
        data(){
            return {
                form: new Form({
                    title:'',
                    description:'',
                    cat_id:'',
                    photo:'',
                })//post hobe ai form ta..jar value ta uporer form hote asbe..by using model
            }
        },

        mounted(){
            this.$store.dispatch("allCategory")
        },
        methods:{
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

                }
                
                    
         },
           addnewPost(){
              this.form.post("/add-post")
                 .then((response)=>{
                         this.$router.push('/post-list')
                         Swal.fire({
                              type: 'success',
                              title: 'Done.',
                              text: 'Post Added successfully!',
                              footer: '<a href>Why do I have this issue?</a>'
                            })
                    })
           }
  
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