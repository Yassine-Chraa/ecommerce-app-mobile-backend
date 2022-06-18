<template>
  <div class="content-wrapper">
    <section id="statistiques">
      <div class="container-fluid">
        <div class="row" style="justify-content: center;">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"
                >More info <i class="fas fa-arrow-circle-right"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"
                >More info <i class="fas fa-arrow-circle-right"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Weekly Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"
                >More info <i class="fas fa-arrow-circle-right"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="row" style="padding-top: 20px">
          <div class="col-lg-6 col-12">
            <div class="card" style="padding-left: 7.5px">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>
                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                  >
                    <i class="fas fa-minus"></i>
                  </button>
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="remove"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Popularity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <a href="pages/examples/invoice.html">OR9842</a>
                        </td>
                        <td>Call of Duty IV</td>
                        <td>
                          <span class="badge badge-success">Shipped</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="pages/examples/invoice.html">OR1848</a>
                        </td>
                        <td>Samsung Smart TV</td>
                        <td>
                          <span class="badge badge-warning">Pending</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="pages/examples/invoice.html">OR7429</a>
                        </td>
                        <td>iPhone 6 Plus</td>
                        <td>
                          <span class="badge badge-danger">Delivered</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="pages/examples/invoice.html">OR7429</a>
                        </td>
                        <td>Samsung Smart TV</td>
                        <td>
                          <span class="badge badge-info">Processing</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="pages/examples/invoice.html">OR1848</a>
                        </td>
                        <td>Samsung Smart TV</td>
                        <td>
                          <span class="badge badge-warning">Pending</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="pages/examples/invoice.html">OR7429</a>
                        </td>
                        <td>iPhone 6 Plus</td>
                        <td>
                          <span class="badge badge-danger">Delivered</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <a href="pages/examples/invoice.html">OR9842</a>
                        </td>
                        <td>Call of Duty IV</td>
                        <td>
                          <span class="badge badge-success">Shipped</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer clearfix">
                <a
                  href="javascript:void(0)"
                  class="btn btn-sm btn-info float-left"
                  >Place New Order</a
                >
                <a
                  href="javascript:void(0)"
                  class="btn btn-sm btn-secondary float-right"
                  >View All Orders</a
                >
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>
                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                  >
                    <i class="fas fa-minus"></i>
                  </button>
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="remove"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item" v-for="(product, ind) in products" ::key="ind">
                    <div class="product-img">
                      <img
                        src="dist/img/default-150x150.png"
                        alt="Product Image"
                        class="img-size-50"
                      />
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"
                        >{{product.name}}
                        <span class="badge badge-warning float-right"
                          >${{product.price}}</span
                        ></a
                      >
                      <span class="product-description">
                        {{product.description}}
                      </span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  methods: {
    getLatest() {
      axios
        .get("/api/latestProduct")
        .then((res) => {
          this.products = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  mounted() {
    this.getLatest();
  },
};
</script>
<style>
#statistiques {
  padding: 30px 15px;
}
</style>
