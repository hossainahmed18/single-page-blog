export default{
	state:{
         category:[],
         post:[],
         blogpost:[],
         statSinglePost:{},
         statUserCategories:[],
         statCategoryPost:[],
         statLatestPost:[]

         
	},
	getters:{
         getCategory(state){
         	return state.category

         },
         getPost(state){
            return state.post

         },
         getBlogPost(state){
            return state.blogpost

         },
         passSinglePost(state){
            return state.statSinglePost

         },
         passUserCategories(state){
            return state.statUserCategories

         },
         passAllCategoryPost(state){
            return state.statCategoryPost

         },
         passSearchPost(state){
            return state.statSearchPost

         },
         passLatestPost(state){
            return state.statLatestPost

         },

	},
	actions:{
         allCategory(context){
             axios.get('/category')
                 .then((response)=>{
                 	//console.log(response.data.categories);
                 	context.commit('categories',response.data.categories)
                 })
         },
         allPost(context){
             axios.get('/post')
                 .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('posts',response.data.posts)
                 })
         },
         allBlogPost(context){
             axios.get('/blogpost')
                 .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('blogposts',response.data.posts)
                 })
         },
         getSinglePost(context,Payload){
             axios.get('/single-post/'+Payload)
                 .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('mutSinglePost',response.data.post)
                 })
         },
         userGetAllCategories(context){
             axios.get('/user-categories')
                 .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('mutUserCategories',response.data.usercategories)
                 })
         },

         getAllCategoryPost(context,Payload){
              axios.get('/category-post/'+Payload)
                 .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('mutCategoryPost',response.data.categorypost)
                 })
         },

         getSearchPost(context,Payload){
              axios.get('/search?s='+Payload)
                 .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('mutSearchPost',response.data.searchpost)
                })
         },
         getLatestPost(context,Payload){
              axios.get('/latestpost')
                 .then((response)=>{
                    //console.log(response.data.categories);
                    context.commit('mutLatestPost',response.data.latestpost)
                })
         },



	},
	mutations:{
         categories(state,Payload){
            return state.category = Payload
         },
         posts(state,Payload){
         	return state.post = Payload
         },
         blogposts(state,Payload){
            return state.blogpost = Payload
         },
         mutSinglePost(state,Payload){
            return state.statSinglePost = Payload
         },

         mutUserCategories(state,Payload){
            return state.statUserCategories = Payload
         },
         mutCategoryPost(state,Payload){
            return state.statCategoryPost = Payload
         },
         mutSearchPost(state,Payload){
            return state.blogpost = Payload
         },
         mutLatestPost(state,Payload){
            return state.statLatestPost = Payload
         },
	}
} 