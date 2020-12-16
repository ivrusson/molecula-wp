export default {
  base: '/app1Name',
  publicPath: '/app1/',
  outputPath: './dist',
  mountElementId: 'app1',
  qiankun: {
    master: {
      apps: [
        {
          name: 'app2',
          entry: process.env.NODE_ENV === 'production' ? '/moapp/app2' : 'http://localhost:8002/app2',
        },
      ],
    },
    slave: {},
  },
  plugins: [
    require.resolve('../../node_modules/@umijs/plugin-dva/lib'),
    require.resolve('../../node_modules/@umijs/plugin-model/lib'),
    require.resolve('../../node_modules/@umijs/plugin-antd/lib'),
    require.resolve('../../node_modules/@umijs/plugin-qiankun/lib'),
  ],
};
