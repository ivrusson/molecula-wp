// @ts-nocheck
import { plugin } from './plugin';
import * as Plugin_0 from 'C:/Users/ivrus/molecula-wp/apps/molecula/app.js';
import * as Plugin_1 from 'C:/Users/ivrus/molecula-wp/apps/molecula/.umi/plugin-dva/runtime.tsx';
import * as Plugin_2 from '../plugin-model/runtime';
import * as Plugin_3 from '@@/plugin-qiankun/masterRuntimePlugin';

  plugin.register({
    apply: Plugin_0,
    path: 'C:/Users/ivrus/molecula-wp/apps/molecula/app.js',
  });
  plugin.register({
    apply: Plugin_1,
    path: 'C:/Users/ivrus/molecula-wp/apps/molecula/.umi/plugin-dva/runtime.tsx',
  });
  plugin.register({
    apply: Plugin_2,
    path: '../plugin-model/runtime',
  });
  plugin.register({
    apply: Plugin_3,
    path: '@@/plugin-qiankun/masterRuntimePlugin',
  });
