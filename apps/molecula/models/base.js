import { query } from '@/services/app';

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

export default {
  namespace: 'base',

  state: {
    name: 'Qiankun',
    apps: [],
  },

  effects: {
    *getApps(_, { put }) {
      /*
        Sub-application configuration information is obtained in two ways: synchronous and asynchronous
        There are two configuration methods for synchronization:
        1. app.js exports the qiankun object
        2. The configuration is written in the umi configuration file and can be obtained through import @tmp/subAppsConfig
      */
      yield sleep(1000);

      const apps = yield query();
      yield put({
        type: 'getAppsSuccess',
        payload: {
          apps,
        },
      });
    },
  },

  reducers: {
    getAppsSuccess(state, { payload }) {
      return {
        ...state,
        apps: payload.apps,
      };
    },
  },
};
