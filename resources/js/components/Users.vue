<template>
  <div class="content-wrapper">
    <section id="products">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8 col-push-2" style="margin: auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                  <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse"
                  >
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped projects">
                  <thead>
                    <tr>
                      <th style="width: 5%">id</th>
                      <th style="width: 20%">Name</th>
                      <th style="width: 20%">email</th>
                      <th>statue</th>
                      <th>Tools</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(product, ind) in products" :key="ind">
                      <td>
                        {{ product.id }}
                      </td>
                      <td>
                        <a href="#">
                          {{ product.name }}
                        </a>
                      </td>
                      <td>
                        {{ product.email }}
                      </td>
                      <td>
                        {{ product.statue }}
                        <i
                          class="fas fa-dollar-sign"
                          style="font-size: 14px"
                        ></i>
                      </td>
                      <td class="text-left">
                        <button
                          type="button"
                          class="btn btn-info btn-sm"
                          data-toggle="modal"
                          data-target="#modal-edit"
                          @click="openForm('edit', product)"
                        >
                          <i class="fas fa-pencil-alt"> </i>
                          Edit
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger btn-sm"
                          @click="executeAction('delete', product.id)"
                        >
                          <i class="fas fa-trash"> </i>
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <ul
                  class="pagination"
                  style="
                    justify-content: right;
                    margin-bottom: 0;
                    padding-top: 15px;
                    cursor: pointer;
                  "
                >
                  <li class="page-item" v-if="page > 1" @click="page--">
                    <a class="page-link">Previous</a>
                  </li>
                  <li class="page-item disabled" v-else>
                    <a class="page-link">Previous</a>
                  </li>
                  <li
                    class="page-item"
                    v-for="ind in count"
                    @click="page = ind"
                    :key="ind"
                  >
                    <a class="page-link">{{ ind }}</a>
                  </li>
                  <li class="page-item" v-if="page < count" @click="page++">
                    <a class="page-link">Next</a>
                  </li>
                  <li class="page-item disabled" v-else>
                    <a class="page-link">Next</a>
                  </li>
                </ul>
              </div>
            </div>
            <div style="width: 25%; margin: auto">
              <button
                type="button"
                class="btn btn-block btn-primary"
                data-toggle="modal"
                data-target="#modal-edit"
                @click="openForm('add')"
              >
                Add User
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div
      class="modal fade"
      id="modal-edit"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      data-backdrop="static"
      data-keyboard="false"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">
              <span style="text-transform: capitalize">{{ action }}</span>
              User
            </h4>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <input
                type="text"
                placeholder="Name"
                v-model="form.name"
                class="form-control"
              />
            </div>
            <div class="input-group mb-3">
              <input
                type="email"
                placeholder="Email"
                v-model="form.email"
                class="form-control"
              />
            </div>
            <div class="input-group mb-3">
              <input
                type="password"
                placeholder="Password"
                v-model="form.password"
                class="form-control"
              />
              <div class="input-group-append">
                <span class="input-group-text"
                  ><i class="fas fa-dollar-sign"></i
                ></span>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group mb-3">
                <select
                  class="form-control"
                  name="type"
                  v-model="form.type"
                >
                  <option v-for="(type, ind) in types" :key="ind">
                    {{ type }}
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button
              type="button"
              class="btn btn-default"
              id="close"
              data-dismiss="modal"
            >
              Close
            </button>
            <button
              type="button"
              class="btn btn-primary"
              @click="executeAction(action)"
            >
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
      form: {},
      action: "",
      page: 1,
      count: 1,
    };
  },
  watch: {
    page: function () {
      this.getUsers(this.page);
    },
  },
  methods: {
    getUsers(page = undefined) {
      if (page == undefined) {
        page = 1;
        setTimeout(() => {
          document.getElementsByClassName("page-item")[page].classList +=
            " active";
        }, 100);
      } else {
        for (let i = 1; i <= this.count + 1; i++) {
          document.getElementsByClassName("page-item")[i].classList =
            "page-item";
        }
        if (page <= this.count) {
          document.getElementsByClassName("page-item")[page].classList +=
            " active";
        }
      }
      axios
        .get("/api/users?page=" + page)
        .then((res) => {
          this.users = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
      axios
        .get("/api/usersNbr")
        .then((res) => {
          this.count =
            res.data % 2 != 0
              ? Math.floor(res.data / 2) + 1
              : Math.floor(res.data / 2);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    openForm(action, user = undefined) {
      this.action = action;
      if (action == "edit") {
        const { id, name, email, password, statue } = product;
        this.form = { id, name, email, password, statue };
      }
      if (action == "add") {
        this.form = {};
      }
    },
    executeAction(action, id = undefined) {
      switch (action) {
        case "edit":
          axios
            .put("/api/users/" + this.form.id, this.form)
            .then((res) => {
              this.getUsers();
              document.getElementById("close").click();
            })
            .catch((err) => {
              console.log(err);
            });
          break;
        case "add":
          axios
            .post("/api/users", this.form)
            .then((res) => {
              this.getUsers();
              document.getElementById("close").click();
            })
            .catch((err) => {
              console.log(err);
            });
          break;
        case "delete":
          axios
            .delete("/api/users/" + id)
            .then((res) => {
              this.getUsers();
              document.getElementById("close").click();
            })
            .catch((err) => {
              console.log(err);
            });
          break;
        default:
          break;
      }
    },
  },
  mounted() {
    this.getProducts();
  },
};
</script>
<style>
#products {
  padding: 30px 15px;
}

.modal-backdrop {
  display: none !important;
}
</style>
