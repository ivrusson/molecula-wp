
      let options = {"masterHistoryType":"browser","base":"/demo"};
      export const getMasterOptions = () => options;
      export const setMasterOptions = (newOpts) => options = ({ ...options, ...newOpts });
      