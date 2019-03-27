<template>
    <div>
                

                <section class="content">
                       
				        <div class="row row justify-content-around">
					        <div class="col-12">


					            <div class="card">


							            <div class="card-header">
							                 <h3 class="card-title">Category List</h3>

							                 <div class="card-tools">
							                       
							                             <router-link to="/add-category" class="btn btn-primary">
							                                  Add Category
							                             </router-link> 
							                       

							                 </div>


							            </div>

							            <!-- /.card-header -->


							            <div class="card-body">
									            <table id="example2" class="table table-bordered table-hover">
									                <thead>
										                <tr>  
										                      <th>
										                           <select name="" id="" v-model="select" @change="deleteSelected">

										                               <option>select</option>
										                               <option>Delete</option>
										                           </select>

										                            <input type="checkbox" @click="selectAll" v-model="all_select">

										                            <span v-if="all_select==false">Check All</span>
                                                                    <span v-else>Uncheck All</span>

										                      </th>

											                  <th>Sl</th>
											                  <th>Category Name</th>
											                  <th>Date</th>
											                  <th>Actions</th>
											                 
											            </tr>
									                </thead>


									                <tbody>
											            <tr v-for="(category,i) in getAllCategory ">
											                  <td> <input  type="checkbox" v-model="categoryItem" :value="category.id" > </td>
											                  <td>{{category.id}}</td>
											                  <td>{{category.cat_name}}</td>
											                  <td>{{category.created_at |timeformat}}</td>

											                  <td>
											                       <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
											                  </td>

											                  <td>
											                       <a href="#" @click.prevent="deleteCategory(category.id)">Delete</a>
											                  </td>
											                  
											            </tr>
											            
									                
									                
									                </tbody>
									              

									            </table>
							            </div>
			                            <!-- /.card-body -->

			                            <div>
			                                 <ul>
			                                     <li v-for="pp in getItem">{{pp}}</li>
			                                  </ul>
			                            </div>

			                            

			                            

			                            




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

        data(){
            return{
                categoryItem:[8,9,10],
                select:"",
                all_select: false,

                
            }
            
        },
        mounted(){
            this.$store.dispatch("allCategory")
        },
        computed:{
            

            getAllCategory(){
                 return this.$store.getters.getCategory

            },
            getItem(){
                 return this.categoryItem
            },
            
            
           

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
             deleteSelected(){
                axios.get('/delete-category/'+this.categoryItem)
                     .then((response)=>{
                          this.categoryItem=[]
                          this.$store.dispatch("allCategory")
                          Swal.fire({
							  type: 'success',
							  title: 'Done',
							  text: 'Category Deleted Successfully!',
							  footer: '<a href>Why do I have this issue?</a>'
							})
                     })
             },

             selectAll(){
                if(this.all_select==false){ 
                   this.all_select = true
                   for(var category in this.getAllCategory){
                       this.categoryItem.push(this.getAllCategory[category].id)
                   }
                }else{
                    this.all_select = false
                    this.categoryItem = []
                }
                

             }
             
             
        }

     }   
</script>

<style scoped>
</style>