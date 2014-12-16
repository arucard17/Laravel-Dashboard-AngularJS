// Underscore deepClone
_.mixin({ deepClone: function (p_object) { return JSON.parse(JSON.stringify(p_object)); } });
