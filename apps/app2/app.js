export const qiankun = {
  async bootstrap(props) {
    console.log('app2 bootstrap', props);
  },
  async mount(props) {
    console.log('app2 mount', props);
  },
  async unmount(props) {
    console.log('app2 unmount', props);
  },
};

export function patchRoutes(routes) {
  console.log('app2 patchRoutes', routes);
}

export function onRouteChange(obj) {
  console.log('app2 onRouteChange', obj);
}

