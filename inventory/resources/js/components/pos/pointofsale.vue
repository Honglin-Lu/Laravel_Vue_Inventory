<template>
  <div>
            <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">POS</li>
            </ol>
          </div>

          <div class="row mb-3">
            
            <!-- Area Chart -->
            <div class="col-xl-5 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
                  <a class="btn btn-sm btn-info"><font color="#ffffff">Add Customer</font></a>
                </div>
                
             
                <div class="table-responsive" style="font-size:12px;">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="#">Name</a></td>
                        <td>Qty</td>
                        <td>Unit</td>
                        <td>Total</td>
                        <td><a href="#" class="btn btn-sm btn-primary">X</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">Name</a></td>
                        <td>Qty</td>
                        <td>Unit</td>
                        <td>Total</td>
                        <td><a href="#" class="btn btn-sm btn-primary">X</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">Name</a></td>
                        <td>Qty</td>
                        <td>Unit</td>
                        <td>Total</td>
                        <td><a href="#" class="btn btn-sm btn-primary">X</a></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Quantity:<strong>56</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sub Total:<strong>562 $</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Vat:<strong>56 %</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total:<strong>5623 $</strong>
                        </li>
                       
                    </ul>
                    <br>
                    <form>
                        <label>Customer Name</label>
                        <select class="form-control" v-model="customer_id">
                            <option>Kazi</option>
                            <option>Jas</option>
                        </select>
                        <label>Pay</label>
                        <input type="text" class="form-control" required="" v-model="pay">

                        <label>Due</label>
                        <input type="text" class="form-control" required="" v-model="due">

                        <label>Pay By</label>
                        <select class="form-control" v-model="customer_id">
                            <option value="HandCash">Hand Cash</option>
                            <option value="Cheque">Cheque</option>
                            <option value="GiftCard">Gift Card</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
             



              </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-7 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                </div>
                <!--..Category.Wise.Product.-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Product</a>
  </li>
  
  <li class="nav-item" v-for="category in categories" :key="category.id">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" @click="subproduct(category.id)">{{ category.category_name }}</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
       <div class="card-body">
            <input type="text" v-model="searchTerm" class="form-control" style="width: 560px;" placeholder="Search Product">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product in filtersearch" :key="product.id">
                    <a href="#">
                    <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
                        <img class="card-img-top" :src="product.image" id="em_photo">
                        <div class="card-body">
                            <h6 class="card-title">{{ product.product_name }}</h6>
                                <span class="badge badge-success" v-if="product.product_quantity >= 1">Available {{ product.product_quantity }}</span>
                                <span class="badge badge-danger" v-else>Stock out</span>
                        </div>
                    </div></a>
                </div>

            </div>
        </div>
  </div><!--..End Tabs Home.-->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <input type="text" v-model="getsearchTerm" class="form-control" style="width: 560px;" placeholder="Search Product">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="getproduct in getfiltersearch" :key="getproduct.id">
                    <a href="#">
                    <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
                        <img class="card-img-top" :src="getproduct.image" id="em_photo">
                        <div class="card-body">
                            <h6 class="card-title">{{ getproduct.product_name }}</h6>
                                <span class="badge badge-success" v-if="getproduct.product_quantity >= 1">Available {{ getproduct.product_quantity }}</span>
                                <span class="badge badge-danger" v-else>Stock out</span>
                        </div>
                    </div></a>
                </div>

            </div>

  </div>
</div>
<!--..End Category.Wise.Product.-->
               
              
              </div>
            </div>
          
          </div>
          <!--Row-->

        </div>  
   
  </div>
</template>

<script>
  export default {
    created() {
      console.log(User.loggedIn())
      if (!User.loggedIn()){
        this.$router.push({ name: '/' })
      }
    },
    created() {
        this.allProduct();
        this.allCategory();
    },
    data() {
      return{
        products:[],
        categories:[],
        getproducts:[],
        searchTerm: '',
        getsearchTerm: '',

      }
    },
    computed: {
      filtersearch(){
        return this.products.filter(product => {
          return product.product_name.match(this.searchTerm)
        })
      },
      getfiltersearch(){
        return this.getproducts.filter(getproduct => {
          return getproduct.product_name.match(this.getsearchTerm)
        })
      },
    },
    
    methods:{
      allProduct(){
        axios.get('/api/product/')
        .then(({data}) => (this.products = data))
        .catch()
      },
      allCategory(){
        axios.get('/api/category/')
        .then(({data}) => (this.categories = data))
        .catch()
      },
      subproduct(id){
        axios.get('/api/getting/product/'+ id)
        .then(({data}) => (this.getproducts = data))
        .catch()
      }
 
    },
    
  }
</script>

<style scoped>
  #em_photo{
    height: 100px;
    width: 135px;
  }
</style>