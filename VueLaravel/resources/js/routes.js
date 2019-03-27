import adminhomee from './components/myadmin/adminhome.vue';
import categoryList from './components/myadmin/category/list.vue'; 
import AddCategory from './components/myadmin/category/New.vue';
import EditCategory from './components/myadmin/category/Edit.vue';

import postList from './components/myadmin/post/list.vue'; 
import AddPost from './components/myadmin/post/New.vue';
import EditPost from './components/myadmin/post/Edit.vue';
import ViewPost from './components/myadmin/post/Edit.vue';

//Front End Component
import PublicHome from './components/fuser/PublicHome.vue';
import BlogPost from './components/fuser/blog/BlogPost.vue';
import SinglePost from './components/fuser/blog/SinglePost.vue';
import CategoryPost from './components/fuser/blog/CategoryPost.vue';


import Ex from './components/ExampleComponent.vue';

export const routes = [
  { path: '/home', component: adminhomee },
  { path: '/bar', component: Ex },
  { path: '/category-list', component: categoryList },
  { path: '/add-category', component: AddCategory },
  { path: '/edit-category/:categoryId', component: EditCategory },

  { path: '/post-list', component: postList },
  { path: '/add-post', component: AddPost },
  { path: '/edit-post/:postId', component: EditPost },
  { path: '/view-post/:postId', component: ViewPost },

  //Front End Routes
  { path: '/', component:PublicHome},
  { path: '/blog', component:BlogPost},
  { path: '/singlepost/:postId', component:SinglePost},
  { path: '/category/:categoryId', component:CategoryPost},
  
  
  

]