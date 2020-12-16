// @ts-nocheck
import { plugin } from './plugin';
import * as Plugin_0 from 'C:/Users/ivrus/molecula-wp/apps/app3/app.js';
import * as Plugin_1 from '../plugin-model/runtime';
import * as Plugin_2 from '@@/plugin-qiankun/slaveRuntimePlugin';

  plugin.register({
    apply: Plugin_0,
    path: 'C:/Users/ivrus/molecula-wp/apps/app3/app.js',
  });
  plugin.register({
    apply: Plugin_1,
    path: '../plugin-model/runtime',
  });
  plugin.register({
    apply: Plugin_2,
    path: '@@/plugin-qiankun/slaveRuntimePlugin',
  });
