import { name } from './package.json';

export default {
  base: name,
  publicPath: '/app2/',
  outputPath: './dist',
  mountElementId: 'app2',
  qiankun: {
    slave: {},
  },
  plugins: [
    require.resolve('../../node_modules/@umijs/plugin-dva/lib'),
    require.resolve('../../node_modules/@umijs/plugin-model/lib'),
    require.resolve('../../node_modules/@umijs/plugin-antd/lib'),
    require.resolve('../../node_modules/@umijs/plugin-qiankun/lib'),
  ],
};
