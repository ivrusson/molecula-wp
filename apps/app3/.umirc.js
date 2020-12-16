export default {
  publicPath: '/app3/',
  outputPath: './dist',
  mountElementId: 'app3',
  qiankun: {
    slave: {},
  },
  plugins: [
    require.resolve('../../node_modules/@umijs/plugin-model/lib'),
    require.resolve('../../node_modules/@umijs/plugin-antd/lib'),
    require.resolve('../../node_modules/@umijs/plugin-qiankun/lib'),
  ],
  routes: [
    { path: '/', exact: true, component: './index.js' },
    { path: '/:abc', component: './$abc.js' },
    { path: '/users', component: './user/index.js' },
  ],
};
