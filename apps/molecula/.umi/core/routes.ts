// @ts-nocheck
import React from 'react';
import { ApplyPluginsType } from 'C:/Users/ivrus/molecula-wp/node_modules/@umijs/runtime';
import * as umiExports from './umiExports';
import { plugin } from './plugin';

export function getRoutes() {
  const routes = [
  {
    "path": "/",
    "component": require('C:/Users/ivrus/molecula-wp/apps/molecula/layouts/index.js').default,
    "routes": [
      {
        "path": "/app2",
        "exact": false,
        "component": require('C:/Users/ivrus/molecula-wp/apps/molecula/pages/app2/index.js').default
      },
      {
        "path": "/app3",
        "microApp": "app3",
        "base": "/",
        "settings": {
          "singular": false
        },
        "microAppProps": {
          "autoSetLoading": true,
          "className": "appClassName",
          "wrapperClassName": "wrapperClass"
        },
        "exact": false,
        "component": (() => {
    const getMicroAppRouteComponent = require('@@/plugin-qiankun/common').getMicroAppRouteComponent;
    return getMicroAppRouteComponent({ appName: 'app3', base: '/demo', masterHistoryType: 'browser', routeProps: {'settings':{'singular':false},'autoSetLoading':true,'className':'appClassName','wrapperClassName':'wrapperClass'} })
  })()
      },
      {
        "path": "/",
        "component": require('C:/Users/ivrus/molecula-wp/apps/molecula/pages/index.js').default,
        "exact": true
      }
    ]
  }
];

  // allow user to extend routes
  plugin.applyPlugins({
    key: 'patchRoutes',
    type: ApplyPluginsType.event,
    args: { routes },
  });

  return routes;
}
