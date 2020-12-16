export const qiankun = {
  async update(props) {
    console.log('app1 update', props);
  },
  async bootstrap(props) {
    console.log('app1 bootstrap', props);
  },
  async mount(props) {
    console.log('app1 mount', props);
  },
  async unmount(props) {
    console.log('app1 unmount', props);
  },
};

export function patchRoutes(routes) {
  console.log('app1 patchRoutes', routes);
}

export function onRouteChange(obj) {
  console.log('app1 onRouteChange', obj);
}