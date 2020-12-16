
      let options = {"masterHistoryType":"browser","base":"/app1Name","apps":[{"name":"app2","entry":"http://localhost:8002/app2"}]};
      export const getMasterOptions = () => options;
      export const setMasterOptions = (newOpts) => options = ({ ...options, ...newOpts });
      